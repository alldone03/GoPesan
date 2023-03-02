import datetime


def time_in_range(start, end, current):
    """Returns whether current is in the range [start, end]"""
    return start <= current <= end


start = datetime.time(8, 0, 0)
end = datetime.time(10, 52, 0)
current = datetime.datetime.now().time()
print(time_in_range(start, end, current))
# True (if you're not a night owl) ;)
