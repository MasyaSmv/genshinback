import genshinhelper as gh

cookie = 'account_id=17109653; cookie_token=58QEGy2yIt8A5kF861ZO5Of1uCgtapOo4FBzDnQ1'
g = gh.Genshin(cookie)
roles = g.roles_info
sign = g.rewards_info_url
print(sign)
